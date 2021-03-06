import React, {Component} from 'react';
import {Button, Checkbox, Table} from "semantic-ui-react";
import NavBar from "./NavBar";
import Scoring from "./Scoring";

class Attendance extends Component {
	constructor(props) {
		super(props);
		this.state = {
			isLoading: true,
			isFinalizing: false,
			playerList: [],
			checkList: {},
			isReadyToScore: false
		};

		this.handleFinalize = this.handleFinalize.bind(this);
	}

	componentDidMount() {
		const {match} = this.props;
		const ScheduleId = match.params.sid;
		const TeamId = match.params.tid;

		fetch(`//${window.location.hostname}/user/api/attendance.php?sid=${ScheduleId}&tid=${TeamId}`,
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

	handleFinalize(){
		this.setState({isFinalizing: true});

		setTimeout(() => {
			const {match} = this.props;

			let formData = new FormData();
			formData.append('sid', match.params.sid);
			formData.append('tid', match.params.tid);
			formData.append('players', Object.keys(this.state.checkList));

			fetch(`//${window.location.hostname}/user/api/attendance.php`,
				{
					body: formData,
					method: "POST"
				}).then(response => response.json())
				.then((jsondata) => {
					this.setState({
						isFinalizing: false,
						isReadyToScore: true
					});
				});
		}, 500)
	}

	render() {
		// Load the Scoring UI
		if (this.state.isReadyToScore){
			return <Scoring data={this.state.checkList} targetSID={this.props.match.params.sid} />
		}

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
				rowData = this.state.playerList.map((value, index, array) => {
					return (
						<Table.Row key={value.id}>
							<Table.Cell collapsing>{value.id}</Table.Cell>
							<Table.Cell>{value.first_name}</Table.Cell>
							<Table.Cell>{value.last_name}</Table.Cell>
							<Table.Cell>{value.position}</Table.Cell>
							<Table.Cell>{value.jersey_num}</Table.Cell>
							<Table.Cell collapsing>
								<Checkbox toggle onChange={(e, data) => {
									if (data.checked){
										const name = `[${value.jersey_num}] ${value.first_name} ${value.last_name}`;
										this.setState({"checkList": {...this.state.checkList, ...{[value.id]: name}}});
										return;
									}

									const newList = Object.assign({}, this.state.checkList);
									delete newList[value.id];
									this.setState({"checkList": newList})
								}} />
							</Table.Cell>
						</Table.Row>
					)
				});
			}
		}

		return (
			<>
				<NavBar name={"attendance"} />
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

					{this.state.isFinalizing ?
						<Button loading className={"right floated"}>Loading</Button>:
						<button className="ui green button right floated" onClick={this.handleFinalize}
								disabled={Object.keys(this.state.checkList).length < 5}
						>Finalize</button>
					}
				</div>
			</>
		);
	}
}

export default Attendance;