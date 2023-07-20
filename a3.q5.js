setInterval(getCurrentDate,1000);


function getCurrentDate(){
var month;
var day;
var dayofmonth;
var year;
var hour;
var minute;
var seconds;
const date=new Date();
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

month = months[date.getMonth()];
const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
day=days[date.getDay()];
dayofmonth=date.getDate();
year=date.getFullYear();
hour=date.getHours();
minute=date.getMinutes();
seconds=date.getSeconds();
document.getElementById("header1").innerHTML=`${day}, ${month} ${dayofmonth} ${year}   ${date.toLocaleTimeString()}`;
}
function enableBrand(answer){
var Dog="Dog";
console.log(answer.value);
if(answer.value==Dog){
document.getElementById('3').classList.remove('d-none');
document.getElementById('4').classList.add('d-none');
}else{
document.getElementById('4').classList.remove('d-none');
document.getElementById('3').classList.add('d-none');
}
}
