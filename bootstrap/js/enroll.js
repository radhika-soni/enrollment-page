
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

    // if (called == 3) {
    //     for (i = 0; i < b.length; i++) {
    //         if (!b[i].checked) {
    //             b[i].disabled = true;
    //         }
    //     }
    // } else {
    // var able = 0;
    // for (i = 0; i < b.length; i++) {
    //     // console.log(b[i].getAttribute('id'));
    //     if (b[i].checked) {
    //         called++;
    //     } else {
    //         if (called >= 3) {
    //             for (i = 0; i < b.length; i++) {
    //                 if (!b[i].checked) {
    //                     b[i].disabled = true;
    //                 }
    //             }
    //             able = 3;
    //             // called--;
    //         } else {
    //             called = 0;
    //             able = 8;
    //             for (i = 0; i < b.length; i++) {
    //                 if (b[i].checked) {
    //                     called++;
    //                 } else {
    //                     if (b[i].disabled) {
    //                         able--;
    //                     }
    //                 }
    //             }
    //             if (called < 3 && able == 3) {
    //                 for (i = 0; i < b.length; i++) {
    //                     if (!b[i].disabled) {
    //                         able++;
    //                         b[i].disabled = false;
    //                     }
    //                 }
    //                 // }
    //                 if (able == 3) {
    //                     for (i = 0; i < b.length; i++) {
    //                         if (b[i].disabled) {
    //                             b[i].disabled = false;
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }
    // // }
    // console.log(called);
// }





// function display(e) {
//     var subjects = document.getElementById('subjects');
//     var boxes = subjects.querySelectorAll('input[type="checkbox"]');
//     // var idc = e.target.getAttribute('id');//gets the id(i.e.,name of every subject) of every checkbox
//     //traversing through all the cboxes to find if user unchecked a box then do disable=false for every cbox again
//     // console.log(idc);
//     // console.log(e.target.checked);
//     for (i = 0; i < boxes.length; i++) {
//         var checks = 0;
//         // console.log(boxes[i].getAttribute('id'));//gives id of each box which is the name of the subject;
//         // const sub = boxes[i].getAttribute('id');
//         if (boxes[i].checked) {
//             checks++;
//             // console.log(num);
//             // console.log(sub + "is checked")

//         } else {
//             // num--;
//             continue;
//         }
//     }
//     console.log(checks);
//     if (checks < 3) {
//         for (i = 0; i < boxes.length; i++) {
//             //disable=false for every boxe;
//             if (boxes[i].disabled) {
//                 boxes[i].disabled = false;
//             }
//         }
//     }
//     if (num == 3) {
//         for (i = 0; i < boxes.length; i++) {
//             if (!boxes[i].checked) {
//                 boxes[i].disabled = true;
//             }
//         }
//     }
//     console.log(boxes.length);
//     for (i = 0; i < boxes.length; i++) {
//         // console.log(boxes[i].getAttribute('id'));//gives id of each box which is the name of the subject;
//         const sub = boxes[i].getAttribute('id');

//         if (boxes[i].checked) {
//             console.log(num);
//             // console.log(sub + "is checked")
//             for (i = 0; i < boxes.length; i++) {
//                 if (boxes[i].checked) {
//                     num++;
//                 } else {

//                 }
//             }
//         }
//     }
// }