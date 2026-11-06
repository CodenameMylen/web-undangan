import './bootstrap';
import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.Alpine = Alpine;

const writeCookie = (name, value, days = 30) => {
  const expires = new Date(Date.now() + days * 86400000).toUTCString();
  document.cookie = `${name}=${value}; expires=${expires}; path=/; SameSite=Lax`;
};

window.invitationApp = ({ openedFromCookie = false } = {}) => ({
  isOpen: openedFromCookie,
  activeMap: 'akad',
  lightboxOpen: false,
  lightboxImage: '',
  audioPlaying: false,

  openInvitation() {
    this.isOpen = true;
    writeCookie('invitation_opened', '1');

    this.$nextTick(() => {
      const main = document.getElementById('main-content');
      if (main) {
        main.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
      AOS.refreshHard();
      this.playAudio();
    });
  },

  playAudio() {
    const audio = this.$refs.bgm;
    if (!audio) {
      return;
    }

    audio
      .play()
      .then(() => {
        this.audioPlaying = true;
      })
      .catch(() => {
        this.audioPlaying = false;
      });
  },

  toggleAudio() {
    const audio = this.$refs.bgm;
    if (!audio) {
      return;
    }

    if (audio.paused) {
      audio.play();
      this.audioPlaying = true;
      return;
    }

    audio.pause();
    this.audioPlaying = false;
  },

  openLightbox(imageUrl) {
    this.lightboxImage = imageUrl;
    this.lightboxOpen = true;
    document.body.style.overflow = 'hidden';
  },

  closeLightbox() {
    this.lightboxOpen = false;
    this.lightboxImage = '';
    document.body.style.overflow = '';
  },

  mapTabClass(tab) {
    return this.activeMap === tab
      ? 'bg-teal text-white shadow-soft'
      : 'bg-white/70 text-textbrown';
  },

  init() {
    if (this.isOpen) {
      this.$nextTick(() => {
        this.playAudio();
      });
    }
  },
});

window.guestbookApp = ({ initialWishes = [] } = {}) => ({
  guestName: '',
  message: '',
  notice: '',
  wishes: [...initialWishes],

  submitWish() {
    if (!this.guestName.trim() || !this.message.trim()) {
      this.notice = 'Nama dan ucapan wajib diisi.';
      return;
    }

    const now = new Date();
    const pad = (value) => String(value).padStart(2, '0');
    const formattedTime = `${pad(now.getDate())}/${pad(now.getMonth() + 1)}/${now.getFullYear()} ${pad(now.getHours())}:${pad(now.getMinutes())} WIB`;

    this.wishes.unshift({
      guest_name: this.guestName.trim(),
      message: this.message.trim(),
      created_at: formattedTime,
    });

    this.guestName = '';
    this.message = '';
    this.notice = 'Ucapan dan doa berhasil ditambahkan.';
  },
});

window.rsvpApp = () => ({
  name: '',
  guest_count: 1,
  attendance_status: 'hadir',
  notice: '',

  submitRsvp() {
    if (!this.name.trim()) {
      this.notice = 'Nama wajib diisi.';
      return;
    }

    this.notice = `Terima kasih, ${this.name.trim()}. Konfirmasi Anda (${this.attendance_status.replace('_', ' ')}) sudah tercatat di browser ini.`;
    this.name = '';
    this.guest_count = 1;
    this.attendance_status = 'hadir';
  },
});

window.countdownTimer = (targetDate) => ({
  days: '00',
  hours: '00',
  minutes: '00',
  seconds: '00',
  interval: null,

  init() {
    this.tick(targetDate);
    this.interval = setInterval(() => this.tick(targetDate), 1000);
  },

  tick(targetDate) {
    const target = new Date(targetDate).getTime();
    const now = Date.now();
    const gap = Math.max(target - now, 0);

    const days = Math.floor(gap / (1000 * 60 * 60 * 24));
    const hours = Math.floor((gap / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((gap / (1000 * 60)) % 60);
    const seconds = Math.floor((gap / 1000) % 60);

    this.days = String(days).padStart(2, '0');
    this.hours = String(hours).padStart(2, '0');
    this.minutes = String(minutes).padStart(2, '0');
    this.seconds = String(seconds).padStart(2, '0');

    if (gap <= 0 && this.interval) {
      clearInterval(this.interval);
    }
  },
});

window.addEventListener('load', () => {
  AOS.init({
    duration: 850,
    easing: 'ease-out-cubic',
    once: false,
    offset: 40,
  });
});

Alpine.start();
