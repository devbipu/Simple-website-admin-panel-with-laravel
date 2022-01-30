// Start courses js codes


// form clear
function clearCourseForms(form){
    $(form + ' input').val('');
}

// Show all Course form db
function courseShow(){
    
    var url = '/getallcourses';
    axios.get(url)
        .then(function(response) {

            var courseData = response.data;

            if(response.status == 200){
                $('#courses').DataTable().destroy();
                $('#course_tbl').empty();
                $.each(courseData, function(i,item){
                    $('<tr>').html(
                        "<td><img style='width: 100px;' src='/"+ courseData[i].image+"'></td>" +
                        "<td>" + courseData[i].title+"</td>" +
                        "<td>" + courseData[i].description+"</td>" +
                        "<td><a href='#' class='btn btn-primary'>Go somewhere</a></td>" +
                        "<td class='tbl_icons'><a class='courseDeleteBTN' data-id='" + courseData[i].id+"'><i class='bi bi-trash'></i></a> <a data-id='" + courseData[i].id+"' class='courseEditBTN'><i class='bi bi-pencil-square'></i></a></td>"
                    ).appendTo('#course_tbl')
                })

                //delete action
                $('.courseDeleteBTN').click(function(){
                    $('#deleteCourseModal').modal('show');
                    let courseId = $(this).data('id');
                    $('#deleteOk').attr('course-id', courseId);
                });

                // Edit data
                $('.courseEditBTN').click(function(){
                    $('#editCourse').modal('show');
                    let courseId = $(this).data('id');
                    $('#editCourseOk').attr('course-id', courseId);
                    allCourseAsId(courseId)
                })

                // Update query

                $("#editCourseOk").click(function(){
                    let courseId = $(this).attr('course-id');
                    $('#editCourse').modal('hide');
                    updateCourse(courseId)
                })

                $('#courses').DataTable();
                $('.dataTables_length').addClass('bs-select');
            }
        })
        .catch(function(error) {
            console.log(error);
        })
}



// Delete confirm Button
$('#deleteOk').click(function(){
    let courseId = $(this).attr('course-id');
    $('#deleteCourseModal').modal('hide');
    deleteCourse(courseId);
    courseShow()
})

// Show Delete data by id
function deleteCourse(courseId){

    axios.post('/delete_course', {id: courseId})
        .then(function(response){
            console.log(response.status);
        })
        .catch(function(error) {
            console.log(error);
        })
}


// Edit course id
function courseEditBTN(courseId){
    axios.post('/edit_course', {id: courseId})
        .then(function(response){
            console.log(response.status);
        })
        .catch(function(error) {
            console.log(error);
        })
}

// Get all data into edit modal
function allCourseAsId(courseId){
    
    axios.post('/edit_course', {id: courseId})
        .then(function(response){
            if(response.status == 200){
                $("#editCourseTitle").val(response.data[0].title);
                $("#editCourseDesc").val(response.data[0].description);
                $("#editCourseImgLink").val(response.data[0].image);
                console.log(response.data);
            }
            //console.log(response.status);
        })
        .catch(function(error) {
            console.log(error);
        })
}

//Update course 

function updateCourse(courseId){
    let cTitle = $("#editCourseTitle").val();
    let cDesc = $("#editCourseDesc").val();
    let cImg = $("#editCourseImgLink").val();

    var data = {
        id      : courseId,
        title   : cTitle,
        desc    : cDesc,
        image   : cImg,
    }

    axios.post('/update_course', data)
    .then(function(response){
        console.log(response);
        clearCourseForms('#editCourse')
        courseShow()
    })
    .catch(function(error) {
        console.log(error);
    })
}


// Add new data

 // open add course modal
 $('#courseAddBtn').click(function(){
    $('#addCourse').modal('show');
    
})

$('#addCourseOk').click(function(){
    addNewCourse()
})



function addNewCourse(){
    let cTitle = $("#addCourseTitle").val();
    let cDesc = $("#addCourseDesc").val();
    let cImg = $("#addCourseImgLink").val();

    var data ={
        title: cTitle,
        desc: cDesc,
        image: cImg
    }

    axios.post('/add_course', data)
    .then(function(response){
        if(response.status == 200){    
            $('#addCourse').modal('hide');
            console.log(response.data);
            clearCourseForms('#addCourse');
            courseShow()
        }
    })
    .catch(function(error) {
        console.log(error);
    })
}