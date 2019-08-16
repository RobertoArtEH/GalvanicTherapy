$('#searchIcon').click(function() {
  $('#searchInput').toggleClass('search-input-active');
});

$('#searchIconSM').click(function() {
  $('#searchInputSM').toggleClass('search-input-sm-active');
  $('#logo').toggleClass('d-none');
  $('#searchSM').siblings().toggleClass('d-none');
  $('#cartSM').toggleClass('d-flex');
});