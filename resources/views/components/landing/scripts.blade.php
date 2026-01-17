<script>
document.addEventListener('DOMContentLoaded', function () {
  const slides = document.querySelectorAll('.info-slide');
  const dots = document.querySelectorAll('.dot');
  let current = 0;

  function setSlide(index){
    slides[current].classList.remove('active');
    dots[current].classList.remove('active');

    current = (index + slides.length) % slides.length;

    slides[current].classList.add('active');
    dots[current].classList.add('active');
  }

  document.querySelectorAll('[data-info-prev]').forEach(btn => {
    btn.addEventListener('click', () => setSlide(current - 1));
  });
  document.querySelectorAll('[data-info-next]').forEach(btn => {
    btn.addEventListener('click', () => setSlide(current + 1));
  });

  dots.forEach((d, i) => d.addEventListener('click', () => setSlide(i)));
});
</script>
