<!-- FAQ + CTA Section -->
<div class="bg-white">
  <div class="max-w-7xl mx-auto py-20 px-6 md:px-16 lg:px-28">

    <!-- FAQ Section -->
    <div class="mb-28 flex flex-col">
      <h2 class="text-3xl md:text-4xl font-bold text-center mb-14 relative inline-block mx-auto">
        Pertanyaan Yang Sering Ditanyakan
        <span class="block w-24 h-1 bg-[#007E5D] mx-auto mt-4 rounded-full"></span>
      </h2>

      <!-- FAQ Accordion -->
      <div class="space-y-5" id="faqAccordion">
        <!-- FAQ Item -->
        <div class="faq-item border border-[#007E5D] rounded-xl overflow-hidden shadow-sm">
          <button class="faq-button w-full py-4 px-6 text-left bg-[#007E5D] text-white hover:bg-[#006E4D] transition-all flex items-center justify-between">
            <span class="font-medium text-base md:text-lg">Apakah saya bisa mendaftarkan lebih dari 1 lowongan ?</span>
            <i class="fa-solid fa-chevron-down text-white transition-transform duration-300"></i>
          </button>
          <div class="faq-content hidden px-6 py-4 bg-gray-50">
            <p class="text-gray-600 leading-relaxed">
              Ya, Anda dapat mendaftar di lebih dari satu lowongan selama memenuhi kualifikasi yang dipersyaratkan. 
              Namun, pastikan setiap lamaran Anda disertai berkas dan motivasi yang relevan.
            </p>
          </div>
        </div>

        <!-- Duplikasi FAQ Item -->
        <div class="faq-item border border-[#007E5D] rounded-xl overflow-hidden shadow-sm">
          <button class="faq-button w-full py-4 px-6 text-left bg-[#007E5D] text-white hover:bg-[#006E4D] transition-all flex items-center justify-between">
            <span class="font-medium text-base md:text-lg">Bagaimana cara mengetahui status lamaran saya?</span>
            <i class="fa-solid fa-chevron-down text-white transition-transform duration-300"></i>
          </button>
          <div class="faq-content hidden px-6 py-4 bg-gray-50">
            <p class="text-gray-600 leading-relaxed">
              Anda dapat memantau status lamaran melalui dashboard akun Anda di website ini.
            </p>
          </div>
        </div>

        <div class="faq-item border border-[#007E5D] rounded-xl overflow-hidden shadow-sm">
          <button class="faq-button w-full py-4 px-6 text-left bg-[#007E5D] text-white hover:bg-[#006E4D] transition-all flex items-center justify-between">
            <span class="font-medium text-base md:text-lg">Apakah program magang ini berbayar?</span>
            <i class="fa-solid fa-chevron-down text-white transition-transform duration-300"></i>
          </button>
          <div class="faq-content hidden px-6 py-4 bg-gray-50">
            <p class="text-gray-600 leading-relaxed">
              Program magang ini tidak dipungut biaya apapun. Hati-hati terhadap pihak yang mengatasnamakan panitia.
            </p>
          </div>
        </div>

        <div class="faq-item border border-[#007E5D] rounded-xl overflow-hidden shadow-sm">
          <button class="faq-button w-full py-4 px-6 text-left bg-[#007E5D] text-white hover:bg-[#006E4D] transition-all flex items-center justify-between">
            <span class="font-medium text-base md:text-lg">Kapan jadwal seleksi akan diumumkan?</span>
            <i class="fa-solid fa-chevron-down text-white transition-transform duration-300"></i>
          </button>
          <div class="faq-content hidden px-6 py-4 bg-gray-50">
            <p class="text-gray-600 leading-relaxed">
              Jadwal seleksi akan diumumkan secara resmi melalui website dan email peserta yang telah terdaftar.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

 <!-- CTA Section -->
<div class="relative w-full h-[500px] ">
  <!-- Background Image -->
  <div class="absolute inset-0">
    <img src="{{ asset('images/gambar3.jpg') }}" alt="Gedung DPR" class="w-full h-full object-cover">
    <!-- Ganti overlay-nya jadi hitam transparan -->
    <div class="absolute inset-0 bg-black/70"></div>
  </div>

  <!-- Content -->
  <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
    <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">
      Tertarik Bergabung Dengan Kami?
    </h2>
    <p class="text-white/90 text-base md:text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
      Mari menjadi bagian dari kami dan kembangkan potensi terbaikmu di lingkungan profesional Dewan Perwakilan Rakyat Republik Indonesia.
    </p>
    <a href="#" class="inline-block bg-[#FCD12A] text-black font-semibold px-10 py-4 rounded-lg hover:bg-yellow-300 transform hover:scale-105 transition-all duration-300 shadow-lg">
      Daftar Sekarang
    </a>
  </div>
</div>

<!-- Accordion Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-button');
    faqButtons.forEach(button => {
      button.addEventListener('click', function() {
        const faqItem = this.parentElement;
        const content = faqItem.querySelector('.faq-content');
        const icon = this.querySelector('i');
        // Close all other
        document.querySelectorAll('.faq-item').forEach(item => {
          if (item !== faqItem) {
            const c = item.querySelector('.faq-content');
            const i = item.querySelector('i');
            c.style.maxHeight = null;
            c.classList.add('hidden');
            i.style.transform = 'rotate(0deg)';
          }
        });
        // Toggle current
        if (content.classList.contains('hidden')) {
          content.classList.remove('hidden');
          content.style.maxHeight = content.scrollHeight + 'px';
          icon.style.transform = 'rotate(180deg)';
        } else {
          content.style.maxHeight = null;
          setTimeout(() => content.classList.add('hidden'), 300);
          icon.style.transform = 'rotate(0deg)';
        }
      });
    });
    // Set transition for all faq-content
    document.querySelectorAll('.faq-content').forEach(c => {
      c.style.transition = 'max-height 0.3s cubic-bezier(0.4,0,0.2,1)';
      c.style.overflow = 'hidden';
      c.style.maxHeight = null;
    });
  });
</script>
