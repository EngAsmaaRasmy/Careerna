$(document).ready(function() {
    $("#completeForm").validate({
        rules: {
            first_name: {
                required: true,
                maxlength: 20,
            },
            last_name: {
                required: true,
                maxlength: 20,
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 15,
                number: true
            },
            data_of_birth: {
                required: true,
                date: true
            },
            city: {
                required: true,
            },
            country: {
                required: true,
            },
            candidates_status: {
                required: true,
            },
            experience: {
                required: true,
            },
            education_level_id: {
                required: true,
            },
            completeJobTitles: {
                required: true,
            },
            completeCategories: {
                required: true,
            },
            salary: {
                required: true,
                min: 1,
                number: true
            },
        },
        messages: {
            first_name: {
                required: "First name is required",
                maxlength: "First name cannot be more than 20 characters"
            },
            last_name: {
                required: "Last name is required",
                maxlength: "Last name cannot be more than 20 characters"
            },
            phone: {
                required: "Phone number is required",
                minlength: "Phone number must be of 10 digits"
            },
            data_of_birth: {
                required: "Date of birth is required",
                date: "Date of birth should be a valid date"
            },
            city: {
                required: "City is required",
            },
            country: {
                required: "Country is required",
            },
            candidates_status: {
                required: "Candidates Status is required",
            },
            experience: {
                required: "Experience is required",
            },
            education_level_id: {
                required: "Education Level is required",
            },
            completeJobTitles: {
                required: "you must selct at least two job titles",
            },
            completeCategories: {
                required: "you must selct at least two categories",
            },
            salary: {
                required: "Salary is required",
                min: "Salary must be greater than 0"
            },
        }
    });
});