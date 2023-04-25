
// const sub = document.getElementsByClassName('art');
// var num = 0;
// document.getElementById("submit").addEventListener("click", function (event) {
//     // event.preventDefault()
//     event.stopPropagation();
// // });
// document.getElementById("submit").addEventListener("click",
function cbox(event) {
    var check = 0;
    const a = document.getElementById('subjects');
    const b = a.querySelectorAll('input[type="checkbox"]');
    for (i = 0; i < b.length; i++) {
        if (b[i].checked) {
            check++;
        }
    }
    if (check < 3) {
        // alert("you should select 3 subjects");
        const emsg = document.getElementById('error');
        emsg.innerHTML = "you should select 3 subjects";
        // event.preventDefault();
        // event.stopPropagation();

    }
}
function call() {
    var called = 0;
    var able = 8;
    const a = document.getElementById('subjects');
    const b = a.querySelectorAll('input[type="checkbox"]');
    for (i = 0; i < b.length; i++) {
        if (b[i].checked) {
            called++;
        }
        if (b[i].disabled) {
            able--;
        }
    }
    if (called == 3) {
        //disable the unchecked;
        for (i = 0; i < b.length; i++) {
            if (!b[i].checked) {
                b[i].disabled = true;
            }
        }
    } else {
        //when 3rd checked cbox unchecked;
        if (called < 3 && able == 3) {
            //enable the disabled;
            for (i = 0; i < b.length; i++) {
                if (b[i].disabled) {
                    b[i].disabled = false;
                }
            }
            // console.log("this condition");
        }
    }
    // console.log(called);
    // console.log(able);

}

