<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<h1>GENERATE CARDLINK</h1>

<p>data Match ===>insert table PerformanceDetail.</p>
<p>data Unmatch ===>insert table PerformanceUnmatch.</p>

<button onclick="start(0)">GENERATE</button>

<p id="demo"></p>

<script>
function myFunctionx() {
  document.getElementById("demo").innerHTML = "Hello World";
}


function start(counter){
let banyak_data=<?=$jumlah_row?>;

  if(counter < banyak_data){
    setTimeout(function(){
      counter++;
      // console.log(counter);
proses_generate(counter);
// proses_generate(counter,BatchID);
// const url='<?=site_url('systemcardlink/proses_performancedetail_tes/')?>';
// window.open(url,'_blank');

//   document.getElementById("demo").innerHTML = counter;

      
      start(counter);
    }, 100);
  }
}
//start(0);


// function proses_generate(counter,BatchID)
function proses_generate(counter)
{
let BatchID=<?=$BatchID?>;

        $.ajax({
            url : "<?php echo site_url('systemcardlink/test_generate')?>/",
            type: "POST",
            dataType: "JSON",
            data:{counter:counter,BatchID:BatchID},
            success: function(data)
            {

console.log(data);

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error proses data');
            }
        });

}

//for(let i=1;i<=5;i++){
//setTimeout(()=>{console.log(i)},1000);
//}



</script>

</body>
</html>
