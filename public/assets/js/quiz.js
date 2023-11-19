
let questions = [
    {
        id: 1,
        question: "What is the Full Form Of RAM?",
        answer: "Random Access Memory",
        options: [
            "Run Accept Memory",
            "Random All Memory",
            "Random Access Memory",
            "None of these"
        ]
    },
    {
        id: 2,
        question: "What is the Full-Form of CPU?",
        answer: "Central Processing Unit",
        options: [
            "Central Program Unit",
            "Central Processing Unit",
            "Central Preload Unit",
            "None of these"
        ]
    },
    {
        id: 3,
        question: "What is the Full-Form of E-mail",
        answer: "Electronic Mail",
        options: [
            "Electronic Mail",
            "Electric Mail",
            "Engine Mail",
            "None of these"
        ]
    },
    {
        id: 4,
        question: "'DB' in computer means?",
        answer: "DataBase",
        options: [
            "Double Byte",
            "Data Block",
            "DataBase",
            "None of these"
        ]
    },
    {
        id: 5,
        question: "What is FMD?",
        answer: "Fluorescent Multi-Layer Disc",
        options: [
            "Fluorescent Multi-Layer Disc",
            "Flash Media Driver",
            "Fast-Ethernet Measuring Device",
            "None of these"
        ]
    },
    {
        id: 6,
        question: "How many bits is a byte?",
        answer: "8",
        options: [
            "32",
            "16",
            "8",
            "64"
        ]
    },
    {
        id: 7,
        question: "A JPG stands for:",
        answer: "A format for an image file",
        options: [
            "A format for an image file",
            "A Jumper Programmed Graphic",
            "A type of hard disk",
            "A unit of measure for memory"
        ]
    },
    {
        id: 8,
        question: "Which was an early mainframe computer?",
        answer: "ENIAC",
        options: [
            "ENIAC",
            "EDVAC",
            "UNIC",
            "ABACUS"
        ]
    },
    {
        id: 9,
        question: "Main circuit board in a computer is:",
        answer: "Mother board",
        options: [
            "Harddisk",
            "Mother board",
            "Microprocessor",
            "None of these"
        ]
    },
    {
        id: 10,
        question: "ISP stands for:",
        answer: "Internet Service Provider",
        options: [
            "Internet Survey Period",
            "Integreted Service Provider",
            "Internet Security Protocol",
            "Internet Service Provider"
        ]
    },
];

let question_count = 0;
let points = 0;
let total_questions = questions.length;
let timerInt;

window.onload = function () {
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
    timerInt = setInterval(function () {
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

    let question = document.getElementById("questions");
    let [first, second, third, fourth] = questions[count].options;

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
        option[i].onclick = function () {
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
        location.href = "result.html";
    }
    else if (question_count == questions.length - 2) {
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