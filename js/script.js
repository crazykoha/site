$(document).ready(function () {
  $('.jsOpenDelivery').click(function () {
    $('.jsShowModal').fadeIn().css('display', 'flex');
  });
  $('.jsCloseModal').click(function () {
    $('.jsShowModal').fadeOut();
  });
});