function onClick() {
  const locations = [
    { location: "YOSHINOYA", img: "0.jpg" },
    { location: "Mt.FUJI", img: "1.jpg" },
    { location: "GIFU", img: "2.jpg" },
    { location: "HIMEJI", img: "3.jpg" },
    { location: "KYOTO", img: "4.jpg" },
    { location: "OSAKA", img: "5.jpg" },
    { location: "TOKYO", img: "6.jpg" },
  ];

  // locations配列からランダムに取得
  let randomLocation = locations[Math.floor(Math.random() * locations.length)];

  // ランダムに取得した結果をバックグラウンドに設定
  document.getElementById("body").style.backgroundImage = "url(" + "./images/" + randomLocation.img + ")";

  // 地名を画面に表示
  document.getElementById("result").textContent = randomLocation.location;

  // Ranodomで出た地名をPHPに渡す
  /*   $.post("JS_MySQL.php", { input: randomLocation.location }, function (json) {}); */

  function ajax() {
    $.ajax({
      type: "POST",
      url: "php/JS_MySQL.php",
      datatype: "json",
      data: {
        destination: randomLocation.location,
      },
      // 通信が成功した時
      success: function (data) {
        $.each(JSON.parse(data), function (key, value) {
          // #all_show_result内にappendで追記していく
          $("#output_append").prepend("<tr><td>" + value.id + "</td><td>" + value.destination + "</td><td>" + value.created_at + "</td></tr>");
        });
        console.log("通信成功");
        console.log(data);
      },

      // 通信が失敗した時
      error: function (data) {
        console.log("通信失敗");
        console.log(data);
      },
    });
  }

  ajax();
}
