const date = new Date();
const year = date.getFullYear();
const month = date.getMonth() + 1;
const day = date.getDate();
const hour = date.getHours();
const minutes = date.getMinutes();
const input_date = document.getElementById('input_date');
const input_hour = document.getElementById('input_hour');


input_date.value = `${day}/${month}/${year}`;
input_hour.value = `${hour}:${minutes}`;
