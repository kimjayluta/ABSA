import React, {Component} from 'react';
import { Table, Menu, Segment } from 'semantic-ui-react'

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
		/*if (this.state.isLoading){
			return <b>Loading Please wait...</b>
		}

		return <b>There is some found {this.state.scheduleList.length}</b>*/
		return (
			<>
				<div style={{"marginBottom": "20px"}}>
					<Menu pointing secondary>
						<div className="ui container">
							<Menu.Item name='schedules' active={true}/>
							<Menu.Menu position='right'>
								<Menu.Item
									name='logout'
									active={false}
									onClick={this.handleItemClick}
								/>
							</Menu.Menu>
						</div>
					</Menu>
				</div>

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

						<Table.Body>
							<Table.Row>
								<Table.Cell>John Lilki</Table.Cell>
								<Table.Cell>September 14, 2013</Table.Cell>
								<Table.Cell>jhlilk22@yahoo.com</Table.Cell>
								<Table.Cell>No</Table.Cell>
								<Table.Cell>No</Table.Cell>
								<Table.Cell>No</Table.Cell>
							</Table.Row>
							<Table.Row>
								<Table.Cell>Jamie Harington</Table.Cell>
								<Table.Cell>January 11, 2014</Table.Cell>
								<Table.Cell>jamieharingonton@yahoo.com</Table.Cell>
								<Table.Cell>jamieharingonton@yahoo.com</Table.Cell>
								<Table.Cell>jamieharingonton@yahoo.com</Table.Cell>
								<Table.Cell>Yes</Table.Cell>
							</Table.Row>
							<Table.Row>
								<Table.Cell>Jill Lewis</Table.Cell>
								<Table.Cell>May 11, 2014</Table.Cell>
								<Table.Cell>jilsewris22@yahoo.com</Table.Cell>
								<Table.Cell>jilsewris22@yahoo.com</Table.Cell>
								<Table.Cell>jilsewris22@yahoo.com</Table.Cell>
								<Table.Cell>Yes</Table.Cell>
							</Table.Row>
						</Table.Body>
					</Table>
				</div>
			</>

		)
	}
}

export default ScheduleList;