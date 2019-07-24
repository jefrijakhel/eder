    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?=base_url()?>assets/Chart.bundle.js"></script>
    <script src="<?=base_url()?>assets/Chart.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/Chart.js"></script>
    <script src="<?=base_url()?>assets/Chart.min.js"></script>

    <script>
    // Set the date we're counting down to
    
    // var countDownDate = new Date("2019-07-03 14:19:54").getTime();
    var cd = document.getElementById("countdown").value;
    console.log(cd);
    var countDownDate = new Date(cd).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get today's date and time
      var now = new Date().getTime();
        
      // Find the distance between now and the count down date
      var distance = countDownDate - now;
        
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
      // Output the result in an element with id="demo"
      document.getElementById("demo").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";
        
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Pesanan Telah Selesai";
      }
    }, 1000);
    </script>

    <script>

      function view() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('listpesananmakanan').innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', 'http://localhost/project/eder/getTransactionMakanan/', true);
        xhr.send();
      }
      function view2() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('listpesananminuman').innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', 'http://localhost/project/eder/getTransactionMinuman/', true);
        xhr.send();
      }


      $(document).ready(function(){
        if($('#listpesananmakanan').length){
          setInterval(function() { view() }, 1000);
          setInterval(function() { view2() }, 1000);
        }else{
        }
      });

      function cekMeja() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('mejakasir').innerHTML = xhr.responseText;
            }
        }
        xhr.open('GET', 'http://localhost/project/eder/getMeja/', true);
        xhr.send();
      }
      $(document).ready(function(){
        if($('#mejakasir').length){
          setInterval(function() { cekMeja() }, 1000);
          console.log('meja exist');
        }else{
          console.log('meja not exist');
        }
      });

    </script>
    <script>
    $("#printbtn").click(function(){
      var divToPrint=document.getElementById('printarea');
      var newWin=window.open('','Print-Window');

      newWin.document.open();

      newWin.document.write(`<html>
      <head>
      <link href="http://localhost/project/eder/assets/style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body onload="window.print()" style="padding-top:50px;">`+divToPrint.innerHTML+`</body></html>`);

      newWin.document.close();

      setTimeout(function(){newWin.close();},10);
    })

    </script>

    <script>
    var ctx = document.getElementById('transaksi').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?=$label?>],
            datasets: [{
                label: 'Jumlah Penjualan',
                data: [<?=$dataset?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctxMakanan = document.getElementById('topmakanan').getContext('2d');
    var myChartakanan = new Chart(ctxMakanan, {
        type: 'bar',
        data: {
            labels: [<?=$labelmakanan?>],
            datasets: [{
                label: 'Top 10 Makanan',
                data: [<?=$datasetmakanan?>],
                backgroundColor: [
                    'rgba(25, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(25, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctxMinuman = document.getElementById('topminuman').getContext('2d');
    var myChartMinuman = new Chart(ctxMinuman, {
        type: 'bar',
        data: {
            labels: [<?=$labelminuman?>],
            datasets: [{
                label: 'Top 10 Minuman',
                data: [<?=$datasetminuman?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

    <!-- <script type="text/javascript" src="<?=base_url()?>assets/jquery.min.js"></script> -->
    <script type="text/javascript" src="<?=base_url()?>assets/star-rating.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url()?>assets/bootstrap.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            if($('#rating-input').length){
                var $inp = $('#rating-input');
                $inp.rating({
                                min: 0,
                                max: 5,
                                step: 1,
                                size: 'xs',
                                showClear: false
                            });
                $inp.on('rating.change', function () {
                // alert('Nilai rating : '+$('#rating-input').val());
                });
                var $inp2 = $('#rating-input2');
                $inp2.rating({
                                min: 0,
                                max: 5,
                                step: 1,
                                size: 'xs',
                                showClear: false
                            });
                $inp2.on('rating.change', function () {
                // alert('Nilai rating : '+$('#rating-input2').val());
                });
                var $inp3 = $('#rating-input3');
                $inp3.rating({
                                min: 0,
                                max: 5,
                                step: 1,
                                size: 'xs',
                                showClear: false
                            });
                $inp3.on('rating.change', function () {
                // alert('Nilai rating : '+$('#rating-input3').val());
                });
            }
        });
    </script>

  </body>
</html>