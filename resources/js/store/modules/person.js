import router from "../../router";

const state = {
    person: {
        name: null,
        age: null,
        job: null,
    },
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
    },
    update({}, data) {
        axios.patch(`/api/people/${data.person.id}`, {
            name: data.person.name,
            age: data.person.age,
            job: data.person.job,
        })
        .then(response => {
            router.push({
                name: 'person.show',
                params: { id: data.person.id }
            });
        });
    },
    store({}, data) {
        axios.post('/api/people', {
            name: data.name,
            age: data.age,
            job: data.job,
        })
        .then(response => {
            router.push({ name: 'person.index' });
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
