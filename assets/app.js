import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');



import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


// Code pour gérer les onglets dans la page dashboardadmin.html.twig

document.addEventListener('DOMContentLoaded', () => {
    const tabs = ['tab1', 'tab2', 'tab3', 'tab4'];
    const buttons = ['btn1', 'btn2', 'btn3', 'btn4'];
  
    buttons.forEach((btnId, index) => {
      const btn = document.getElementById(btnId);
      if (!btn) return;
  
      btn.addEventListener('click', () => {
        // Cacher tous les tabs
        tabs.forEach(tabId => {
          const tab = document.getElementById(tabId);
          if (tab) tab.classList.add('hidden');
        });
  
        // Afficher l'onglet cliqué
        const activeTab = document.getElementById(tabs[index]);
        if (activeTab) activeTab.classList.remove('hidden');
  
        // Mettre à jour le style des boutons
        buttons.forEach(otherBtnId => {
          const otherBtn = document.getElementById(otherBtnId);
          if (otherBtn) {
            otherBtn.classList.remove('bg-gray-100', 'text-blue-400');
            otherBtn.classList.add('bg-gray-50', 'text-gray-500');
          }
        });
  
        btn.classList.remove('bg-gray-50', 'text-gray-500');
        btn.classList.add('bg-gray-100', 'text-blue-400');
      });
    });
  });
// --------------------------------------------------------------//
