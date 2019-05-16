import React, {Component} from 'react';
import {Table} from 'semantic-ui-react'
import NavBar from "./NavBar";
import {Link} from 'react-router-dom';
class Tournament extends Component {

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
					});
				}else{
					this.setState({
						isLoading: false
					})
				}
			});
	}

	render() {

		let rowData = (
			<Table.Row>
				<Table.Cell colSpan={6} className={"center aligned"}>Loading Data, Please wait...</Table.Cell>
			</Table.Row>
		);


		if (!this.state.isLoading){
			if (this.state.scheduleList.length < 1){
				rowData = (
					<Table.Row>
						<Table.Cell colSpan={6} className={"center aligned"}>Sorry no schedule found</Table.Cell>
					</Table.Row>
				)
			}else{
				rowData = this.state.scheduleList.map(function (value, index, array) {

					const team_id = localStorage.getItem("type") === "1" ? value.t2_id : value.t1_id;
					return (
						<Table.Row key={value.id}>
							<Table.Cell collapsing>{value.id}</Table.Cell>
							<Table.Cell>{value.team_one}</Table.Cell>
							<Table.Cell>{value.team_two}</Table.Cell>
							<Table.Cell>{value.game_type}</Table.Cell>
							<Table.Cell>{value.date + " " + value.time}</Table.Cell>
							<Table.Cell collapsing>
								<Link to={`/schedule/${value.id}/${team_id}`} className="ui blue icon right labeled button">
									<span>Open</span>
									<i aria-hidden="true" className="right arrow icon" />
								</Link>
							</Table.Cell>
						</Table.Row>
					)
				})
			}
		}

		return (
			<>
				<NavBar name={"schedules"} />
				<div className="ui container">
					<Table singleLine>
						<Table.Header>
							<Table.Row>
								<Table.HeaderCell>Id</Table.HeaderCell>
								<Table.HeaderCell>Home</Table.HeaderCell>
								<Table.HeaderCell>Aways</Table.HeaderCell>
								<Table.HeaderCell>Game Type</Table.HeaderCell>
								<Table.HeaderCell>Date</Table.HeaderCell>
								<Table.HeaderCell>Action</Table.HeaderCell>
							</Table.Row>
						</Table.Header>
						<Table.Body>{rowData}</Table.Body>
					</Table>
				</div>
			</>

		)
	}
}

export default Tournament;