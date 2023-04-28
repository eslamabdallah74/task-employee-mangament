import EmployeeList from './components/EmployeeList.vue';
import AddEmployee from './components/AddEmployee.vue';
import EditEmployee from './components/EditEmployee.vue';

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
  }
];

export default routes;
