// function palindrome(str) {
//     str = strip(str.toLowerCase());
//
//     for (var i = 0; i < Math.floor(str.length / 2); i++) {
//         if (str.charAt(i) !== str.charAt(str.length - i - 1)) return false;
//     }
//     return true;
// }
//
// function strip(str) {
//     var copy = "";
//     for (var i = 0; i < str.length; i++) {
//         if ((str.charAt(i) >= "A" && str.charAt(i) <= "Z") || (str.charAt(i) >= "a" && str.charAt(i) <= "z") || (str.charAt(i) >= "0" && str.charAt(i) <= "9")) {
//             copy += str.charAt(i);
//         }
//     }
//     return copy;
// }

// function convertToRoman(num) {
//     if (typeof num !== 'number')
//         return false;
//     //khai báo biến stack, mảng key[29], biến roman_num, biến i
//     //biến stack tách số thành mảng các ký tự. VD: 17227 -> [ '1', '7', '2', '2', '7' ]
//     var stack = String(+num).split(""),
//         key = ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM",
//             "", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC",
//             "", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
//         roman_num = "", //biến chứa số la mã
//         i = 3;
//     while (i-- > 0) {
//         roman_num = (key[+stack.pop() + (i * 10)] || "") + roman_num;
//     }
//     return Array(+stack.join("") + 1).join("M") + roman_num;
// }
//
// console.log(convertToRoman(800));

// let rot13 = (str) => {
//
//     let decoded = {
//         A: 'N', B: 'O', C: 'P',
//         D: 'Q', E: 'R', F: 'S',
//         G: 'T', H: 'U', I: 'V',
//         J: 'W', K: 'X', L: 'Y',
//         M: 'Z', N: 'A', O: 'B',
//         P: 'C', Q: 'D', R: 'E',
//         S: 'F', T: 'G', U: 'H',
//         V: 'I', W: 'J', X: 'K',
//         Y: 'L', Z: 'M'
//     }
//
//     str = str.toUpperCase();
//
//     let decipher = '';
//     for(let i = 0 ; i < str.length; i++){
//         if (str[i]>='A' && str[i]<='Z')
//             decipher += decoded[str[i]];
//         else decipher += str[i];
//     }
//
//     return decipher;
// }
// console.log(rot13('QB JUNG LBH PNAG'));
// console.log(rot13('qb jung lbh pnag'));

// function telephoneCheck(str) {
//     var regex = /^(1\s?)?(\(\d{3}\)|\d{3})[\s\-]?\d{3}[\s\-]?\d{4}$/ ;
//     //^(1\s?)?: Phía đầu phải là "1 ","1",""(Ko có gì)
//     //\( \d{3} \): (3 số bất kỳ)
//     //|: Hoặc là
//     //\d{3}: 3 số bất kỳ(Ko có ngoặc)
//     //[\s\-]?: Hoặc là khoảng trắng, hoặc là dấu '-', hoặc là ko có gì
//     //\d{3}: 3 số bất kỳ
//     //[\s\-]?: Hoặc là khoảng trắng, hoặc là dấu '-', hoặc là ko có gì
//     //\d{4}: 4 số bất kỳ
//     //$: Phía cuối ko được xuống dòng
//     return regex.test(str);
// }
//
// console.log(telephoneCheck("555-555-5555"));

// function checkCashRegister(price, cash, cid) {
//     // figure out change amount due:
//     let change = cash - price   //tổng số tiền thối lại cho khách
//     let totalCid = 0    //tổng số tiền trong ngăn kéo
//     let status = {status: '', change: []}   //chứa trạng thái của tiền thối
//
//     let cidObj = {
//         "PENNY": .01,
//         "NICKEL": .05,
//         "DIME": .1,
//         "QUARTER": .25,
//         "ONE": 1,
//         "FIVE": 5,
//         "TEN": 10,
//         "TWENTY": 20,
//         "ONE HUNDRED": 100
//     }
//
//     // figure out total of cid
//     for (let i = 0; i < cid.length; i++) {
//         totalCid += cid[i][1]   //c[i][j] -> j=0 là tên của mệnh giá, j=1 là tổng số tiền của mệnh giá đó
//     }
//
//     totalCid = Math.round(totalCid * 100) / 100;    //làm tròn đến 2 chữ số thập phân
//
//     if (change === totalCid) {  //nếu tiền thừa phải trả lại cho khách === tổng số tiền trong quầy thanh toán
//         status.status = "CLOSED"    //đóng ngăn kéo
//         status.change = cid //đưa toàn bộ tiền trong ngăn kéo cho khách :v
//         return status
//     } else if (totalCid < change) { //số tiền trong ngăn kéo ko đủ để trả lại cho khách
//         status.status = "INSUFFICIENT_FUNDS"    //thông báo ko đủ tiền trả lại cho khách
//         status.change = []  //ngăn kéo ko còn gì
//     } else {    //nếu tiền thừa phải trả lại cho khách < tổng số tiền trong quầy thanh toán
//         for (let i = cid.length - 1; i >= 0; i--) { //duyệt toàn bộ ngăn kéo từ mệnh giá cao nhất đến mệnh giá thấp nhất
//             if (change >= cidObj[cid[i][0]] && change >= cid[i][1]) {//nếu tiền thừa > tiền ở ngăn thứ i của ngăn kéo(ngăn đó ko được rỗng)
//                 status.change.push(cid[i])  //lấy toàn bộ tiền ở ngăn đó của ngăn kéo đó đưa cho khách
//                 change -= cid[i][1] //tiền còn phải trả cho khách là ...
//                 change = Math.round(change * 100) / 100
//
//
//             } else if (change >= cidObj[cid[i][0]] && change < cid[i][1]) { //nếu tiền thừa trả cho khách < tiền ở ngăn thứ i của ngăn kéo(ngăn đó ko được rỗng)
//                 let amount = Math.floor(change / cidObj[cid[i][0]]) * cidObj[cid[i][0]] //(số tờ ở ngăn kéo có mệnh giá lớn nhất)*(chính mệnh giá đó) cần phải rút ra đưa tạm cho khách
//
//                 status.change.push([cid[i][0], amount]) //đưa tạm amount tờ có mệnh giá c[i][0] dollar cho khách
//                 change -= amount    //số tiền còn phải trả cho khách
//                 change = Math.round(change * 100) / 100
//             }
//         }
//     }
//
//     if (change >= .01) {
//         status.status = "INSUFFICIENT_FUNDS"
//         status.change = []
//     } else {
//         status.status = "OPEN"
//     }
//
//     return status;
// }
//
// var s = checkCashRegister(3.26, 100, [["PENNY", 1.01], ["NICKEL", 2.05], ["DIME", 3.1], ["QUARTER", 4.25], ["ONE", 90], ["FIVE", 55], ["TEN", 20], ["TWENTY", 60], ["ONE HUNDRED", 100]]);
// console.log(s);