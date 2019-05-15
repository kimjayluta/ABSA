import React from 'react';
import 'semantic-ui-css/semantic.min.css';
import LoginForm from "./LoginForm";
import Attendance from "./Attendance";
import Scoring from "./Scoring";
import ScheduleList from "./ScheduleList";


function App() {
  return (
  	<>
		{/*{localStorage.getItem("account") ? <ScheduleList /> : <LoginForm />}*/}
		<Attendance />
		{/*<Scoring />*/}
	</>
  );
}

export default App;
