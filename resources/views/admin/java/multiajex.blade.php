<div class="col-md-8 grid-margin stretch-card">


    <input type="hidden"  id="firstNumber"  value="20" /><br>
    <input type="hidden" id="secondNumber"  value="4"  /><br>
  <input type="button" onClick="multiplyBy()" Value="Multiply"  class="btn btn-primary btn-block" />
  <input type="button" onClick="divideBy()" Value="Divide"  class="btn btn-primary btn-block" />


  <script>
  function multiplyBy()
  {
          num1 = document.getElementById("firstNumber").value;
          num2 = document.getElementById("secondNumber").value;
          document.getElementById("result").innerHTML = num1 * num2;
  }

  function divideBy()
  {
          num1 = document.getElementById("firstNumber").value;
          num2 = document.getElementById("secondNumber").value;
  document.getElementById("result").innerHTML = num1 / num2;
  }

    </script>


          </div>


          <div class="col-md-4 grid-margin stretch-card">
            <br>
            <p>The Result is : <br>
            <span id = "result"></span>
            </p>

          </div>
