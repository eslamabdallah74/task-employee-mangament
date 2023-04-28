import EmployeeList from './components/EmployeeList.vue';
import AddEmployee from './components/AddEmployee.vue';

const routes = [
  {
    path: '/',
    name: 'employeeList',
    component: EmployeeList,
  },
  {
    path: '/add-employee',
    name: 'addEmployee',
    component: AddEmployee
  }
];

export default routes;
