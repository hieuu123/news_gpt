<!DOCTYPE html>
<html>

<head>
  <title>Tìm kiếm bằng Google CSE</title>
</head>

<body>
  <form action="news_generator.php" method="post">
    <input type="text" name="link1">
    <input type="text" name="link2">
    <input type="text" name="link3">
    <button id="auto" type="submit" style="display: none;"></button>
  </form>
  <div class="gcse-search"></div>
  <?php
  $linknews = '';
  if (
    isset($_POST['linknews']) &&
    $_POST['linknews'] != ""
  ) {
    $linknews = $_POST['linknews'];
  }
  echo '<input type="text" name="linknews" value="'.$linknews.'" style="display: none;">';
  ?>
  <script async src="https://cse.google.com/cse.js?cx=01768aec711154ae1"></script>
  <script>
    function clickCloseButton() {
      var closeButton = document.querySelector('.gsc-results-close-btn.gsc-results-close-btn-visible');
      if (closeButton) {
        closeButton.click();
      }
    }
    var auto = document.getElementById('auto');

    function changeValue() {
      var linknews = document.getElementsByName('linknews')[0];
      var inputElement1 = document.getElementById('gsc-i-id1');
      if (inputElement1) {
        inputElement1.value = linknews.value;
      }
      var button = document.querySelector('.gsc-search-button.gsc-search-button-v2');
      // Kiểm tra nếu tìm thấy đối tượng button
      if (button) {
        // Kích hoạt sự kiện click trên button
        button.click();
      }
      setTimeout(function() {
        var show = document.getElementById('gsc-i-id1');
        // Nếu phần tử input tồn tại
        if (show) {
          // Lấy tất cả các phần tử <a> trên trang
          var linkElements = document.getElementsByTagName('a');

          // Tạo một mảng để lưu trữ giá trị href của các phần tử <a>
          var hrefValues = [];

          // Lặp qua danh sách các phần tử <a> và lấy giá trị href của mỗi phần tử
          for (var i = 1; i < linkElements.length; i += 4) {
            var href = linkElements[i].getAttribute('href');
            hrefValues.push(href);
          }
          href = hrefValues;
          // In giá trị href ra console
          console.log(href);
          clickCloseButton();
        }
        var input1 = document.getElementsByName('link1')[0];
        var input2 = document.getElementsByName('link2')[0];
        var input3 = document.getElementsByName('link3')[0];
        if (input1 && input2 && input3) {
          // Gán giá trị cho các trường input
          input1.value = hrefValues[1] || '';
          input2.value = hrefValues[2] || '';
          input3.value = hrefValues[3] || '';
          auto.click();
        }
      }, 2000);
    }
    document.addEventListener('DOMContentLoaded', changeValue);
    window.addEventListener('load', changeValue);
  </script>
</body>

</html>