// $.getJSON('data.json',(data)=>{
//     console.log(data);
//     let html=''
//     data.forEach(item => {
//         let test=item.hasOwnProperty("category")
//         let icon= test==true ? "<i class='click-icon p-3 fa-solid fa-chevron-down'></i>":''

//         html+=`
//             <li class="mt-3 d-flex animationTop delay-0${item.id}">
//                 <a class="link-hover link fs-4 d-block fw-4" href="${item.link}">${item.name}</a>
//                     ${icon}
//             </li>`
//         if(test==true){
//             html+=`<ul class="category-dropdow display-none">`
//             item.category.forEach(item2 =>{
//                 let test2=item2.hasOwnProperty("category2")
//                 let icon2= test2==true ? "<i class='click-icon p-3 fa-solid fa-chevron-down'></i>":''
//                 html+=`
//                 <li class="d-flex my-3">
//                 <a class="link-hover link d-block fs-4 fw-4 fw-4" href="${item2.link}">${item2.name}</a>
//                 ${icon2}
//                 </li>`
//                 if(test2==true){
//                     html+=`<ul class="category-dropdow display-none">`
//                     item2.category2.forEach(item3 =>{
                        
//                         html+=`
//                         <li class="d-flex my-3">
//                         <a class="link-hover link d-block fs-4 fw-4 fw-4" href="${item3.link}">${item3.name}</a>
//                         </li>`
//                     })
//                     html+='</ul>'
//                 }
//             })
//             html+='</ul>'
//         }
        
//     });

    $(document).ready(()=>{
        $('.click-icon').click( (e) =>{
            let index1=$('.click-icon').index(e.currentTarget);
            $.each($('.category-dropdow'),(index,value)=>{
                if(index==index1){
                    $(value).toggleClass('display-block')
                    $(e.currentTarget).siblings('.link').toggleClass('color-red')
                }
            })
            })
    })
// })






