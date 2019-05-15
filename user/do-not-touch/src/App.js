import React from 'react';
import 'semantic-ui-css/semantic.min.css';
import LoginForm from "./LoginForm";
import Attendance from "./Attendance";
import Scoring from "./Scoring";
import ScheduleList from "./ScheduleList";

import {HashRouter, Route} from 'react-router-dom'


function App() {
  return (
  	<HashRouter>
		<Route exact path={"/"} component={() =>
			localStorage.getItem("account") ? <ScheduleList /> : <LoginForm />
		} />

		<Route exact path={"/schedule/:id"} component={Attendance} />

		{/*<Scoring />*/}
	</HashRouter>
  );
}

export default App;
