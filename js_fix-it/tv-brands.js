document.getElementById("brandDivs").onload = writeIt();
function writeIt(){
var brands = ["Samsung","Lg","Akai Repair","Home Theatre Repair","CRT Repair","DLP Repair","GE Repair","Hitachi Repair","JVC Repair","LCD Repair","LG Repair","Magnavox Repair","Mitsubishi Repair","Panasonic Repair","Philips Repair","Plasma Repair","Polaroid Repair","RCA Repair","Samsung Repair","Sanyo Repair","Sharp Repair","Sony Repair","Toshiba Repair","Vizio Repair","Westinghouse Repair"," Zenith Repair"];
var x = document.getElementById("brandDivs");
x.innerHTML = brands.join(' - ');
}