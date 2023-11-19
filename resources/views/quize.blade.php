@extends('layout.app')

@section('content')
    <div class="pageBody">
        <section>
            <div class="container py-5 mb-5">

                <div class="quiz_body">
                    <p class="smallTxt mb-0">
                        Question <span id="attemptedQs"></span> / <span id="totalQs"></span>
                    </p>
                    <div id="stepList" class="mb-3">
                        <!-- steps added dynamically -->
                    </div>
                    <dive class="d-flex justify-content-between align-items-center mb-5">
                        <dive class="scoreInfo">
                            <span>Score</span> <span id='score'></span>
                        </dive>
                        <div class="timerInfo">
                            <img src="assets/images/timer-icon.svg" class="d-inline-block me-2">
                            <span id="timer">0:15</span>
                        </div>
                    </dive>
                    <div id="questions" class="questionBox">
                        <!-- questions added dynamically -->
                    </div>
                    <button id="btn-next" class="blueBtn w-100 mt-5" onclick="next()">Next Question</button>
                </div>
            </div>
        </section>

        <section class="bottomGraphic"></section>

    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        let questions = <?php echo $questions; ?>


        let question_count = 0;
        let points = 0;
        let total_questions = questions.length;
        let timerInt;

        window.onload = function() {
            show(question_count);
            createSteps(total_questions);
            document.getElementById('score').innerHTML = points;

        };

        function createSteps(steps) {
            let stepList = document.getElementById('stepList')
            for (let i = 0; i < steps; i++) {
                const node = document.createElement("span");
                stepList.appendChild(node);
            }
            document.getElementById('totalQs').innerHTML = steps;
        }

        function timer() {
            var sec = 15;
            timerInt = setInterval(function() {
                // console.log('timer called')
                document.getElementById('timer').innerHTML = '0:' + sec;
                sec--;
                if (sec < 0) {
                    clearInterval(timerInt);
                    next();
                }
            }, 1000);
        }

        function show(count) {
            document.getElementById('attemptedQs').innerHTML = question_count + 1;
            // setTimer
            timer();
            // console.log(questions[count].options)
            let question = document.getElementById("questions");
            let [first, second, third, fourth] = JSON.parse(questions[count].options);

            question.innerHTML = `<h6 class='mt-2'>Q${count + 1}.  ${questions[count].question}</h6>
      <ul class="option_group">
      <li class="option">A. ${first}</li>
      <li class="option">B. ${second}</li>
      <li class="option">C. ${third}</li>
      <li class="option">D. ${fourth}</li>
      </ul>`;

            toggleActive();
        }

        function toggleActive() {
            let option = document.querySelectorAll("li.option");
            let nextBtn = document.getElementById('btn-next');
            nextBtn.disabled = true;
            for (let i = 0; i < option.length; i++) {
                option[i].onclick = function() {
                    for (let i = 0; i < option.length; i++) {
                        if (option[i].classList.contains("active")) {
                            option[i].classList.remove("active");
                        }
                    }
                    option[i].classList.add("active");
                    nextBtn.disabled = false;
                }
            }
        }

        function next() {
            // restart timer
            window.clearInterval(timerInt);

            if (question_count == questions.length - 1) {
                var formData = new FormData();
                var score = $("#score").val();
                formData.append("score", sessionStorage.getItem("points"));
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: "POST",
                    url: "/submitquize",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    if (data.status == 201) {
                        // console.log(data)
                        // $('#toasterror').toast('show');
                        // document.getElementById("toast-error").innerHTML = data.msg;
                        // // document.getElementById("modalHead").innerHTML = 'Error';

                    } else {
                        window.location = '/result'
                        // $('#toastsuccess').toast('show');
                        // // document.getElementById("modalHead").innerHTML = 'Success';
                        // document.getElementById("toast-body").innerHTML = data.msg;
                        // setTimeout(() => {
                        //     window.location = "/home";
                        // }, 3000);

                    }
                });


            } else if (question_count == questions.length - 2) {
                let nextBtn = document.getElementById('btn-next');
                nextBtn.innerHTML = 'Submit'
            }

            let steps = document.querySelectorAll("#stepList span")
            steps[question_count + 1].classList.add("current");
            steps[question_count].classList.add("done");

            let user_answer = document.querySelector("li.option.active");
            user_answer = user_answer ? user_answer.innerHTML : null

            if (user_answer && (user_answer.split('.')[1].trim() == questions[question_count].answer)) {
                points += 1;
                sessionStorage.setItem("points", points);
                document.getElementById('score').innerHTML = points;
            }

            question_count++;
            show(question_count);
        }
    </script>
@endsection
