const state = {
    person: null,
    people: null,
};

const getters = {
    person: () => state.person,
    people: () => state.people,
};

const actions = {
    getPerson({state, commit, dispatch}, id) {
        axios.get(`/api/people/${id}`)
             .then(response => {
                 commit('setPerson', response.data.data);
             });
    },
    getPeople({commit}) {
        axios.get('/api/people')
             .then(response => {
                 commit('setPeople', response.data.data);
             });
    },
    deletePerson({dispatch}, id) {
        axios.delete(`/api/people/${id}`)
             .then(response => {
                 dispatch('getPeople');
             });
    }
};

const mutations = {
    setPerson(state, person) {
        state.person = person;
    },
    setPeople(state, people) {
        state.people = people;
    }
};

export default {
    state, getters, mutations, actions
};
