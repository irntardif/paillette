<?= js(['assets/js/isotope.pkgd.min.js']) ?>
<script>
  var elem = document.querySelector('.filter-grid');
  var $iso = new Isotope( elem, {
    // options
    itemSelector: '.filter-item',
    layoutMode: 'fitRows'
  });

  function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
  }

  var $filters = {};

  Array.from(document.querySelectorAll(".filter-button-group button")).forEach(element => {
    element.onclick = (e) => {
      e.preventDefault();
      var filterGroup = element.parentNode.getAttribute('data-filter-group');
      $filters[filterGroup] = element.getAttribute('data-filter');
      let filterValue = concatValues($filters);
      console.log(filterValue);
      $iso.arrange({ filter: filterValue });
    };
  });

   Array.from(document.querySelectorAll(".filter-select")).forEach(element => {
    element.onchange = (e) => {
      e.preventDefault();
       var filterGroup = element.getAttribute('data-filter-group');
      $filters[filterGroup] = event.target.value;
      let filterValue = concatValues($filters);
      console.log(filterValue);
      $iso.arrange({ filter: filterValue });

    };
  });

</script>
