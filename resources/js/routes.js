import EmployeeList from './components/EmployeeList.vue';
import AddEmployee from './components/AddEmployee.vue';
import EditEmployee from './components/EditEmployee.vue';
import EmployeeShift from './components/EmployeeShift.vue';


const routes = [
  {
    path: '/',
    name: 'employeeList',
    component: EmployeeList,
  },
  {
    path: '/employee/create',
    name: 'addEmployee',
    component: AddEmployee
  },
  {
    path: '/employees/:id/edit',
    name: 'editEmployee',
    component: EditEmployee
  },
  {
    path: '/employees/:id/shift',
    name: 'employeeShift',
    component: EmployeeShift
  },
];

export default routes;
