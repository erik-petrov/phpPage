let decision = ""
const dollar = 1.16
const pounds = 0.85
const ruble = 84.2
const yuan = 7.48

function calc(amount, currency) {
    return (amount * currency).toFixed(2)
}

function radioChange(event) {
    let amount = document.getElementById("amount")
    let answer = document.getElementById("answer")
    let img = document.getElementById("pic")
    if (isNaN((parseInt(amount.value)))) return alert("Please enter a number")
    switch (event.target.id) {
        case "dollar":
            answer.innerHTML=calc(amount.value, dollar) + " dollar"
            img.src="content/img/dollar.png"
            break;
        case "ruble":
            answer.innerHTML=calc(amount.value, ruble) + " ruble"
            img.src="content/img/ruble.png"
            break;
        case "yuan":
            answer.innerHTML=calc(amount.value, yuan) + " yuan"
            img.src="content/img/yuan.png"
            break;
        case "pounds":
            answer.innerHTML=calc(amount.value, pounds) + " pounds"
            img.src="content/img/pounds.png"
            break;
    }
}

function selectChange(event) {
    let img2 = document.getElementById("pic2")
    let answer2 = document.getElementById("answer2")
    let amount2 = document.getElementById("amount2")
    if (isNaN((parseInt(amount2.value)))) return alert("Please enter a number")
    switch (event.target.value) {
        case "dollar":
            answer2.innerHTML=calc(amount2.value, dollar) + " dollar"
            img2.src="img/dollar.png"
            break;
        case "ruble":
            answer2.innerHTML=calc(amount2.value, ruble) + " ruble"
            img2.src="img/ruble.png"
            break;
        case "yuan":
            answer2.innerHTML=calc(amount2.value, yuan) + " yuan"
            img2.src="img/yuan.png"
            break;
        case "pounds":
            answer2.innerHTML=calc(amount2.value, pounds) + " pounds"
            img2.src="img/pounds.png"
            break;
    }
}

function selectText() {
    let answer3 = document.getElementById("answer3")
    let amount3 = document.getElementById("amount3")
    console.log((typeof parseInt(amount3.value)))
    switch (document.getElementById("currency").value) {
        case "dollar":
            answer3.innerHTML=calc(amount3.value, dollar) + " dollars"
            break;
        case "ruble":
            answer3.innerHTML=calc(amount3.value, ruble) + " rubles"
            break;
        case "yuan":
            answer3.innerHTML=calc(amount3.value, yuan) + " yuan"
            break;
        case "pounds":
            answer3.innerHTML=calc(amount3.value, pounds) + " pounds"
            break;
        default:
            answer3.innerHTML=null
            break;
    }
}

function showNumbers(action) {
    let numbers = document.getElementById("action")
    switch (action) {
        case "+": case "-": case "-": case "/": case"*":
            decision = action
            numbers.innerHTML="<input type=\"number\" id=\"first\">\n" +
                decision +
                " <input type=\"number\" id=\"second\">"
            break;
        case "Math.cos(": case "Math.tan(": case "ctg(": case "Math.sin(": case "Math.log(":
            decision = action
            numbers.innerHTML=decision +
                "<input type=\"number\" id=\"first\">\n" + ")"
            break;
        default:
            numbers.innerHTML=null
            break;
    }
}

function calculate(){
    let answer4 = document.getElementById("answer4")
    console.log(decision)
    try{
        var f = document.getElementById("first").value
        var s = document.getElementById("second").value

        answer4.innerHTML= eval(f+decision+s)
    } catch (e) {
        var f = document.getElementById("first").value
        answer4.innerHTML = parseFloat(eval(decision+f*(Math.PI/180)+")").toFixed(4))
    }
}
function ctg(x) { return 1 / Math.tan(x); }