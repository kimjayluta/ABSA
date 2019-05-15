import React, {Component} from 'react';
import {Button, Checkbox, Table} from "semantic-ui-react";

class Attendance extends Component {

	state = {
		isLoading: true,
		playerList: []
	};

	componentDidMount() {
		fetch(`//${window.location.hostname}/user/api/attendance.php`,
			{
				// body: formData,
				method: "get"
			}).then(response => response.json())
			.then((jsondata) => {
				if (jsondata.length){
					this.setState({
						isLoading: false,
						playerList: jsondata
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
			if (this.state.playerList.length < 1){
				rowData = (
					<Table.Row>
						<Table.Cell colSpan={6} className={"center aligned"}>Sorry no schedule found</Table.Cell>
					</Table.Row>
				)
			}else{
				rowData = this.state.playerList.map(function (value, index, array) {
					return (
						<Table.Row>
							<Table.Cell collapsing>{value.id}</Table.Cell>
							<Table.Cell>{value.first_name}</Table.Cell>
							<Table.Cell>{value.last_name}</Table.Cell>
							<Table.Cell>{value.position}</Table.Cell>
							<Table.Cell>{value.jersey_num}</Table.Cell>
							<Table.Cell collapsing>
								<Checkbox toggle />
							</Table.Cell>
						</Table.Row>
					)
				})
			}
		}

		return (
			<div className="ui container">
				<Table singleLine>
					<Table.Header>
						<Table.Row>
							<Table.HeaderCell>Id</Table.HeaderCell>
							<Table.HeaderCell>First Name</Table.HeaderCell>
							<Table.HeaderCell>Last Name</Table.HeaderCell>
							<Table.HeaderCell>Position</Table.HeaderCell>
							<Table.HeaderCell>Jersey Num</Table.HeaderCell>
							<Table.HeaderCell>Present</Table.HeaderCell>
						</Table.Row>
					</Table.Header>
					<Table.Body>{rowData}</Table.Body>
				</Table>

				<button className="ui green button right floated">Finalize</button>
			</div>
		);
	}
}

export default Attendance;