import EmployeeList from './components/EmployeeList.vue';
import AddEmployee from './components/AddEmployee.vue';
import EditEmployee from './components/EditEmployee.vue';
import EmployeeShift from './components/EmployeeShift.vue';
import ShiftSchedule from './components/ShiftSchedule.vue';


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
    path: '/employees/shift',
    name: 'employeeShift',
    component: EmployeeShift
  },
  {
    path: '/employees/:id/shift-schedule',
    name: 'shiftSchedule',
    component: ShiftSchedule
  },
];

export default routes;
