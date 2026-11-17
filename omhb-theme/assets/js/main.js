/* Menu mobile du thème OMHB. */
(function () {
  'use strict';

  var burger = document.querySelector('.omhb-burger');
  var navigation = document.querySelector('.omhb-navigation');

  if (!burger || !navigation) {
    return;
  }

  burger.addEventListener('click', function () {
    var ouvert = navigation.classList.toggle('omhb-visible');
    burger.classList.toggle('omhb-ouvert', ouvert);
    burger.setAttribute('aria-expanded', ouvert ? 'true' : 'false');
    burger.setAttribute('aria-label', ouvert ? 'Fermer le menu' : 'Ouvrir le menu');
  });

  navigation.addEventListener('click', function (event) {
    if (event.target.tagName === 'A' && navigation.classList.contains('omhb-visible')) {
      navigation.classList.remove('omhb-visible');
      burger.classList.remove('omhb-ouvert');
      burger.setAttribute('aria-expanded', 'false');
    }
  });
})();
