# Apex Event Classes #

Several of the Apex containers need the ability to communicate with each other by passing Messages, this project defines the Laravel stub classes used for this purpose.

#### Usage ####
Each class consists of an Event class and a corresponding Broadcast class

For example:

`Nexus\ApexEvents\Broadcasts\LogSmash\API\LogApiRequestBroadcast`
`Nexus\ApexEvents\Events\LogSmash\API\LogApiRequestEvent`

This broadcast class is called by the calling container and currently broadcasts over Redis (although other event systems could be used), this is then picked up by by a subscribing container which reacts to the Broadcast by firing the `LogApiRequestEvent` the reason for this is because Laravel does not natively support subscribing to Broadcast events within the Laravel framework. The intention of Broadcast events within Laravel is that the PHP/Laravel side acts as a broadcaster and the Javascript/Client side acts as a consumer of these broadcasts.

The splitting of Broadcasts and Events into separate classes is to ensure that a naming convention is followed which makes it clear what is being done as otherwise a developer may assume that an Event is being fired and consumed within the same container.

This also prevents infinite loops from refiring an Event with the same name as the broadcast.

#### Rules ####

- An Event class MUST have a corresponding Broadcast class in this repository
- This repository is ONLY for the stub Event/Broadcast classes needed to make container interoperability work
- Broadcasts MUST be used for Broadcasting
- Events MUST NOT be used for Broadcasting
- Additional packages MUST NOT be included, this is for pure, native PHP only please. As basic as possible.

#### Systems ####

- DataManager
- LogSmash
