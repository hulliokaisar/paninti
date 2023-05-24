<template>
    <div class="slider">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide" v-for="slide in slides" :key="slide.id">
            <img :src="slide.image" alt="Slider Image">
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </template>
  
  <script>
  import Swiper from 'swiper';
  
  export default {
    data() {
      return {
        slides: [
          { id: 1, image: '/images/slide1.jpg' },
          { id: 2, image: '/images/slide2.jpg' },
          { id: 3, image: '/images/slide3.jpg' },
        ],
      };
    },
    mounted() {
      new Swiper('.swiper-container', {
        loop: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    },
  };
  </script>
  
  <style scoped>
  .swiper-container {
    width: 100%;
    height: 300px;
  }
  
  .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  </style>