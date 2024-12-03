const carousel = document.querySelector('.carousel-container .carousel');
const slides = document.querySelectorAll('.carousel-container .slide');
const prevBtn = document.querySelector('.carousel-container .prev-btn');
const nextBtn = document.querySelector('.carousel-container .next-btn');

let index = 0;

function showSlide(newIndex) {
  index = (newIndex + slides.length) % slides.length;
  carousel.style.transform = `translateX(-${index * 100}%)`;
}

prevBtn.addEventListener('click', () => showSlide(index - 1));
nextBtn.addEventListener('click', () => showSlide(index + 1));

// Automatic sliding
setInterval(() => showSlide(index + 1), 5000);
