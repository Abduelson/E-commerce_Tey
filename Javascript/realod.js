document.addEventListener("DOMContentLoaded", function(event) {
    const tabs = document.querySelectorAll('.tab[data-switcher]');
    tabs.forEach(tab => {
      tab.addEventListener('click', function() {
        const activeTab = this.dataset.tab;
        localStorage.setItem('active_tab', activeTab);
      });
    });
  
    const activeTab = localStorage.getItem('active_tab');
    const pages = document.querySelectorAll('.page');
    if (activeTab) {
      tabs.forEach(tab => {
        if (tab.dataset.tab === activeTab) {
          tab.classList.add('is-active');
        } else {
          tab.classList.remove('is-active');
        }
      });
      pages.forEach(page => {
        if (page.dataset.page === activeTab) {
          page.classList.add('is-active');
        } else {
          page.classList.remove('is-active');
        }
      });
    }
  });

