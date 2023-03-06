
-- question 2

select
    employee_last_name,
    graduation_percentile
from employee_details_table
where
    graduation_percentile > "70%";

-- question 3

select
    employee_code,
    graduation_percentile
from employee_salary_table
    inner join employee_details_table on employee_salary_table.employee_id = employee_details_table.employee_id
where
    graduation_percentile < "70%";


-- question 4

select
    concat(
        employee_first_name,
        " ",
        employee_last_name
    ) fullname
from (
        employee_details_table
        inner join employee_salary_table on employee_details_table.employee_id = employee_salary_table.employee_id
    )
    inner join employee_code_table on employee_code_table.employee_code = employee_salary_table.employee_code
where
    employee_domain not like "JAVA";


-- question 5

select
    employee_domain,
    sum(employee_salary)
from employee_salary_table
    inner join employee_code_table on employee_salary_table.employee_code = employee_code_table.employee_code
group by employee_domain
having employee_domain = "JAVA";

-- question 6

select
    employee_domain,
    sum(employee_salary)
from employee_salary_table
    inner join employee_code_table on employee_salary_table.employee_code = employee_code_table.employee_code
where
    employee_salary > "30k"
group by employee_domain
having employee_domain = "JAVA";

-- question 7

select employee_id
from employee_salary_table
where employee_code not in(
        select employee_code
        from employee_code_table
    );
