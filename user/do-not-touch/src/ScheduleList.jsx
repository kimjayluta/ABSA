import React, {Component} from 'react';

class ScheduleList extends Component {

	state = {
		isLoading: true,
		scheduleList: []
	};

	componentDidMount() {
		fetch(`//${window.location.hostname}/user/api/schedules.php`,
			{
				// body: formData,
				method: "get"
			}).then(response => response.json())
			.then((jsondata) => {
				if (jsondata.length){
					this.setState({
						isLoading: false,
						scheduleList: jsondata
					})
				}else{
					this.setState({
						isLoading: false
					})
				}
			});
	}

	render() {
		if (this.state.isLoading){
			return <b>Loading Please wait...</b>
		}

		return <b>There is some found {this.state.scheduleList.length}</b>
	}
}

export default ScheduleList;