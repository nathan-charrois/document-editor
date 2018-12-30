import React from 'react';
import PropTypes from 'prop-types';
import { Col, Row } from 'reactstrap';
import Filter from './Filter';
import Grid from './Grid';
import Layout from './Layout';
import List from './List';
import Paginate from './Paginate';
import Sort from './Sort';

class Documents extends React.Component {
  constructor() {
    super();
  }

  componentWillMount() {
    this.props.request();
  }

  render() {
    const SelectedView = () => {
      if (this.props.view === 'grid') {
        return <Grid items={this.props.documents} isFetching={this.props.isFetching} />;
      } else {
        return <List items={this.props.documents} isFetching={this.props.isFetching} />;
      }
    };

    return (
      <Layout.Container>
        <Layout.Section>
          <Paginate.Info
            count={this.props.count}
            isFetching={this.props.isFetching} />
        </Layout.Section>
        <Layout.Section>
          <Row>
            <Col xs="6" lg="8">
              <Filter
                filterView={this.props.filterView}
                isFetching={this.props.isFetching} />
            </Col>
            <Col xs="6" lg="4">
              <Sort
                sortView={this.props.sortView}
                isFetching={this.props.isFetching} />
            </Col>
          </Row>
        </Layout.Section>
        <Layout.Section>
          <SelectedView />
        </Layout.Section>
      </Layout.Container>
    );
  }
}

Documents.propTypes = {
  documents: PropTypes.array,
  count: PropTypes.number,
  isFetching: PropTypes.bool,
  hasError: PropTypes.bool,
  view: PropTypes.string,
  request: PropTypes.func.isRequired,
  filterView: PropTypes.func.isRequired,
  sortView: PropTypes.func.isRequired,
};

Documents.defaultProps = {
  documents: [],
  count: 0,
  isFetching: false,
  hasError: false,
  view: 'grid',
};

export default Documents;