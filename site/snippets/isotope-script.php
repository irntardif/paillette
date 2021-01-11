<?= js(['assets/js/isotope.pkgd.min.js']) ?>
<script>
  var elem = document.querySelector('.filter-grid');
  Array.from(document.querySelectorAll(".grid-wrapper")).forEach((wrapper, index) => {
    
   var $grid = wrapper.querySelector('.filter-grid'),
      $iso = new Isotope( $grid, {
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

  Array.from(wrapper.querySelectorAll(".filter-button-group button")).forEach(item => {
    item.onclick = (e) => {
      e.preventDefault();
      
      var filterGroup = item.parentNode.getAttribute('data-filter-group');
      $filters[filterGroup] = item.getAttribute('data-filter');
      let filterValue = concatValues($filters);
      $iso.arrange({ filter: filterValue });
    };
  });

   Array.from(wrapper.querySelectorAll(".filter-select")).forEach(item => {
    item.onchange = (e) => {
      e.preventDefault();
      var filterGroup = item.getAttribute('data-filter-group');
      $filters[filterGroup] = event.target.value;
      let filterValue = concatValues($filters);
      $iso.arrange({ filter: filterValue });
    };
  });
});
 
</script>
