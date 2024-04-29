function cal(){
    var n=document.getElementById("stprice").value;
    var svfee=document.getElementById("sc_fee").value;
    var g=n*(svfee/100);
    var tot;
    tot=Number(n)+Number(g);
    document.getElementById("outTot").innerHTML="LKR "+tot;

}