function btcConvert(){
 var amount = document.getElementById("btc").value;
 var btcCalc = amount * btc;
 var btcCalc = btcCalc.toFixed(2);
 document.getElementById("usd").value = btcCalc;
};