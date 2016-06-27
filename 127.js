function usdConvert(){
 var usd = document.getElementById("usd").value;
 var usdCalc =  usd / btc;
 var usdCalc = usdCalc.toFixed(8);
 document.getElementById("btc").value = usdCalc;
}