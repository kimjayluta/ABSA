import React from 'react';
import 'semantic-ui-css/semantic.min.css';
import LoginForm from "./LoginForm";
import Attendance from "./Attendance";
import ScheduleList from "./ScheduleList";

import {HashRouter, Route} from 'react-router-dom'


function App() {
	if (!localStorage.getItem("account") || !localStorage.getItem("type") || !localStorage.getItem("tour_id")){
		localStorage.removeItem("account");
		localStorage.removeItem("type");
		localStorage.removeItem("tour_id");
	}

	return (
  	<HashRouter>
		<Route exact path={"/"} component={() =>
			localStorage.getItem("account") ? <ScheduleList tourID={localStorage.getItem("tour_id")} /> : <LoginForm />
		} />
		<Route exact path={"/schedule/:sid/:tid"} component={Attendance} />
	</HashRouter>
  );
}

export default App;