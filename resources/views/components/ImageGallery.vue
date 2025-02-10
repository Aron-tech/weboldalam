<template>
  <div class="relative max-w-2xl mx-auto">
    <!-- Kép megjelenítése -->
    <div class="relative overflow-hidden rounded-lg shadow-lg h-96">
      <img
        v-for="(image, index) in images"
        :key="index"
        :src="image"
        :class="[
          'absolute inset-0 w-full h-full object-cover transition-all duration-1000',
          currentIndex === index ? 'opacity-100' : 'opacity-0',
          animationClasses
        ]"
        v-show="currentIndex === index"
      />
    </div>

    <!-- Navigáció -->
    <div class="flex justify-center mt-4 space-x-2">
      <button
        v-for="(image, index) in images"
        :key="index"
        @click="goToImage(index)"
        :class="[
          'w-3 h-3 rounded-full',
          currentIndex === index ? 'bg-blue-500' : 'bg-gray-300'
        ]"
      ></button>
    </div>

    <!-- Vissza/Előre gombok -->
    <button @click="prevImage" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
      &lt;
    </button>
    <button @click="nextImage" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-lg">
      &gt;
    </button>

    <!-- Automatikus váltás gomb -->
    <button @click="toggleAutoPlay" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">
      {{ autoPlay ? 'Megállítás' : 'Indítás' }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    images: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      currentIndex: 0,
      autoPlay: true,
      interval: null,
      animations: [
        'fade', 'slide-left', 'slide-right', 'zoom', 'rotate', 'flip'
      ],
      animationClasses: ''
    };
  },
  methods: {
    nextImage() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
      this.setRandomAnimation();
    },
    prevImage() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
      this.setRandomAnimation();
    },
    goToImage(index) {
      this.currentIndex = index;
      this.setRandomAnimation();
    },
    setRandomAnimation() {
      const randomAnimation = this.animations[Math.floor(Math.random() * this.animations.length)];
      this.animationClasses = `animate-${randomAnimation}`;
    },
    toggleAutoPlay() {
      this.autoPlay = !this.autoPlay;
      if (this.autoPlay) {
        this.startAutoPlay();
      } else {
        clearInterval(this.interval);
      }
    },
    startAutoPlay() {
      this.interval = setInterval(() => {
        this.nextImage();
      }, 30000);
    }
  },
  mounted() {
    this.startAutoPlay();
  },
  beforeUnmount() {
    clearInterval(this.interval);
  }
};
</script>

<style scoped>
/* Egyéni animációk */
@keyframes fade {
  0% { opacity: 0; }
  100% { opacity: 1; }
}

@keyframes slide-left {
  0% { transform: translateX(100%); }
  100% { transform: translateX(0); }
}

@keyframes slide-right {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(0); }
}

@keyframes zoom {
  0% { transform: scale(0.5); }
  100% { transform: scale(1); }
}

@keyframes rotate {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes flip {
  0% { transform: rotateY(0deg); }
  100% { transform: rotateY(360deg); }
}

.animate-fade {
  animation: fade 1s ease-in-out;
}

.animate-slide-left {
  animation: slide-left 1s ease-in-out;
}

.animate-slide-right {
  animation: slide-right 1s ease-in-out;
}

.animate-zoom {
  animation: zoom 1s ease-in-out;
}

.animate-rotate {
  animation: rotate 1s ease-in-out;
}

.animate-flip {
  animation: flip 1s ease-in-out;
}
</style>
