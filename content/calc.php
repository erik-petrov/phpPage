<h1>Currency calculator 1</h1>
<section>
    <form>
        <label for="amount">Enter the amount: </label>
        <input type="number" name="amount" id="amount"> euro
        <fieldset>
            <legend>Select currency</legend>

            <input type="radio" name="currency" id="dollar" onchange="radioChange(event)">
            <label for="dollar">Dollar</label>
            <br>
            <input type="radio" name="currency" id="ruble" onchange="radioChange(event)">
            <label for="ruble">Ruble</label>
            <br>
            <input type="radio" name="currency" id="yuan" onchange="radioChange(event)">
            <label for="yuan">Yuan</label>
            <br>
            <input type="radio" name="currency" id="pounds" onchange="radioChange(event)">
            <label for="pounds">Pounds</label>
        </fieldset>

        <div id="answer"></div>
        <img src="content/img/please.png" alt="a picture" id="pic">
    </form>
</section>
<section>
<h1>Currency calculator 2</h1>
    <form>
        <label for="amount2">Enter the amount: </label>
        <input type="number" name="amount2" id="amount2"> euro to
    <select name="currency2" onchange="selectChange()">
            <option value="--currency--">--currency--</option>
            <option value="dollar">dollar</option>
            <option value="ruble">ruble</option>
            <option value="yuan">yuan</option>
            <option value="pounds">pounds</option>
        </select>
        <div id="answer2"></div>
        <img src="img/please.png" alt="a picture" id="pic2">
    </form>
</section>
<section>
    <h1>Currency calculator 3</h1>
    <form>
        <label for="amount3">Enter the amount: </label>
        <input type="number" name="amount3" id="amount3">
        <br>
        <label for="currency">Enter the currency: (dollar, ruble, yuan, pounds)</label>
        <input type="text" name="currency" id="currency" placeholder="currency">
        <input type="button" value="calculate" onclick="selectText()">

        <div id="answer3"></div>
    </form>
</section>
<section>
    <h1>Reshyatel Primerov</h1>
    <form>
        <input type="button" value="divide" onclick="showNumbers('/')">
        <input type="button" value="multiply" onclick="showNumbers('*')">
        <input type="button" value="subtract" onclick="showNumbers('-')">
        <input type="button" value="add" onclick="showNumbers('+')">
        <input type="button" value="sin" onclick="showNumbers('Math.sin(')">
        <input type="button" value="cos" onclick="showNumbers('Math.cos(')">
        <input type="button" value="tan" onclick="showNumbers('Math.tan(')">
        <input type="button" value="cotan" onclick="showNumbers('ctg(')">
        <input type="button" value="log" onclick="showNumbers('Math.log(')">
        <div id="action"></div>
        <br>

        <input type="button" value="=" onclick="calculate()">
        <div id="answer4"></div>
    </form>
</section>
<a href="https://github.com/erik-petrov/calculatorJS">github</a>