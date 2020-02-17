////////////////// Days //////////////////////
function dtime(d) {
var dayNames = new Array("{{ lang(DAY_1) }}","{{ lang(DAY_2) }}","{{ lang(DAY_3) }}","{{ lang(DAY_4) }}","{{ lang(DAY_5) }}","{{ lang(DAY_6) }}","{{ lang(DAY_7) }}");
var monthNames = new Array("{{ lang(MONTH_1) }}","{{ lang(MONTH_2) }}","{{ lang(MONTH_3) }}","{{ lang(MONTH_4) }}","{{ lang(MONTH_5) }}","{{ lang(MONTH_6) }}","{{ lang(MONTH_7) }}","{{ lang(MONTH_8) }}","{{ lang(MONTH_9) }}","{{ lang(MONTH_10) }}","{{ lang(MONTH_11) }}","{{ lang(MONTH_12) }}");
var now = new Date();
now.setDate(now.getDate());
document.write(dayNames[now.getDay()] + ", " +	now.getDate() + " " +	(monthNames[now.getMonth()]) + ", " + now.getFullYear());
}

